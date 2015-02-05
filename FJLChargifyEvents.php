<?php

namespace FJL\ChargifyBundle;

/**
 * Contains all events thrown in the FOSChargifyBundle
 */
final class FJLChargifyEvents
{
    const WEBHOOK_SIGNUP_SUCCESS              = 'fjl_chargify.webhook.signup_success';
    const WEBHOOK_SIGNUP_FAILURE              = 'fjl_chargify.webhook.signup_failure';
    const WEBHOOK_RENEWAL_SUCCESS             = 'fjl_chargify.webhook.renewal_success';
    const WEBHOOK_RENEWAL_FAILURE             = 'fjl_chargify.webhook.renewal_failure';
    const WEBHOOK_PAYMENT_SUCCESS             = 'fjl_chargify.webhook.payment_success';
    const WEBHOOK_PAYMENT_FAILURE             = 'fjl_chargify.webhook.payment_failure';
    const WEBHOOK_BILLING_DATE_CHANGE         = 'fjl_chargify.webhook.billing_date_change';
    const WEBHOOK_SUBSCRIPTION_STATE_CHANGE   = 'fjl_chargify.webhook.subscription_state_change';
    const WEBHOOK_SUBSCRIPTION_PRODUCT_CHANGE = 'fjl_chargify.webhook.subscription_product_change';
    const WEBHOOK_EXPIRING_CARD               = 'fjl_chargify.webhook.expiring_card';
    const WEBHOOK_CUSTOMER_UPDATE             = 'fjl_chargify.webhook.customer_update';
    const WEBHOOK_COMPONENT_ALLOCATION_CHANGE = 'fjl_chargify.webhook.component_allocation_change';
    const WEBHOOK_METERED_USAGE               = 'fjl_chargify.webhook.metered_usage';
    const WEBHOOK_UPGRADE_DOWNGRADE_SUCCESS   = 'fjl_chargify.webhook.upgrade_downgrade_success';
    const WEBHOOK_UPGRADE_DOWNGRADE_FAILURE   = 'fjl_chargify.webhook.upgrade_downgrade_failure';
    const WEBHOOK_REFUND_SUCCESS              = 'fjl_chargify.webhook.refund_success';
    const WEBHOOK_REFUND_FAILURE              = 'fjl_chargify.webhook.refund_failure';
    const WEBHOOK_UPCOMING_RENEWAL_NOTICE     = 'fjl_chargify.webhook.upcoming_renewal_notice';
    const WEBHOOK_END_OF_TRIAL_NOTICE         = 'fjl_chargify.webhook.end_of_trial_notice';
    const WEBHOOK_STATEMENT_CLOSED            = 'fjl_chargify.webhook.statement_closed';
    const WEBHOOK_STATEMENT_SETTLED           = 'fjl_chargify.webhook.statement_settled';
}