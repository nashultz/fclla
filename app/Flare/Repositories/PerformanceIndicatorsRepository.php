<?php

namespace FCLLA\Flare\Repositories;

use Carbon\Carbon;
use FCLLA\Flare\Plan;
use FCLLA\Flare\Flare;
use FCLLA\Flare\TeamPlan;
use Illuminate\Support\Facades\DB;
use FCLLA\Flare\Contracts\Repositories\PerformanceIndicatorsRepository as Contract;

class PerformanceIndicatorsRepository implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function all($take = 60)
    {
        return array_reverse(
            DB::table('performance_indicators')->orderBy('created_at', 'desc')->take($take)->get()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function forDate(Carbon $date)
    {
        return DB::table('performance_indicators')->where('created_at', $date)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function totalRevenueForUser($user)
    {
        $teamIds = Flare::usesTeams() ? $user->teams->pluck('id')->all() : [];

        return DB::table('invoices')
            ->where('user_id', $user->id)
            ->orWhereIn('team_id', $teamIds)
            ->sum('total');
    }

    /**
     * {@inheritdoc}
     */
    public function totalVolume()
    {
        return DB::table('invoices')->sum('total');
    }

    /**
     * {@inheritdoc}
     */
    public function yearlyRecurringRevenue()
    {
        return $this->monthlyRecurringRevenue() * 12;
    }

    /**
     * Get the monthly recurring revenue.
     * @return float
     */
    public function monthlyRecurringRevenue()
    {
        return $this->recurringRevenueByInterval('monthly') +
        ($this->recurringRevenueByInterval('yearly') / 12);
    }

    /**
     * Get the recurring revenue for the given interval.
     * @param  string  $interval
     * @return float
     */
    protected function recurringRevenueByInterval($interval)
    {
        $total = 0;

        $plans = $interval == 'monthly' ? Flare::allMonthlyPlans() : Flare::allYearlyPlans();

        foreach ($plans as $plan) {
            $total += DB::table($plan instanceof TeamPlan ? 'team_subscriptions' : 'subscriptions')
                    ->where($this->planColumn(), $plan->id)
                    ->where(function ($query) {
                        $query->whereNull('trial_ends_at')
                            ->orWhere('trial_ends_at', '<=', Carbon::now());
                    })
                    ->whereNull('ends_at')
                    ->sum('quantity') * $plan->price;
        }

        return $total;
    }

    /**
     * {@inheritdoc}
     */
    public function subscribers(Plan $plan)
    {
        return DB::table($plan instanceof TeamPlan ? 'team_subscriptions' : 'subscriptions')
            ->where($this->planColumn(), $plan->id)
            ->where(function ($query) {
                $query->whereNull('trial_ends_at')
                    ->orWhere('trial_ends_at', '<=', Carbon::now());
            })
            ->whereNull('ends_at')
            ->count();
    }

    /**
     * {@inheritdoc}
     */
    public function trialing(Plan $plan)
    {
        return DB::table($plan instanceof TeamPlan ? 'team_subscriptions' : 'subscriptions')
            ->where($this->planColumn(), $plan->id)
            ->where('trial_ends_at', '>', Carbon::now())
            ->whereNull('ends_at')
            ->count();
    }

    /**
     * Get the plan column name.
     * @return string
     */
    protected function planColumn()
    {
        return Flare::billsUsingStripe() ? 'stripe_plan' : 'braintree_plan';
    }
}