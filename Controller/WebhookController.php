<?php

namespace FJL\ChargifyBundle\Controller;

use FJL\ChargifyBundle\Event\WebhookEvent;
use FJL\ChargifyBundle\Model\Webhook;
use FJLChargifyBundle\FJLChargifyEvents;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WebhookController extends Controller
{
    public function handlerAction(Request $request)
    {
        //Get the parameters
        $id          = $request->request->get('id', '');
        $event       = $request->request->get('event', '');
        $payload     = $request->request->get('payload', '');
        $signature   = $request->query->get('signature_hmac_sha_256', '');
        $requestBody = $request->getContent();

        //Log some of the parameters
        $logger = $this->get('logger');
        $logger->info('Received Chargify Webhook');
        $logger->info('Webhook Id: ' . $id);
        $logger->info('Webhook Event: ' . $event);
        $logger->info('Webhook Signature: ' . $signature);
        $logger->info('Webhook Body: ' . $requestBody);

        //Get the validator service
        $validator = $this->get('fjl.chargify.signature_validator');

        //Verify signature
        if ($validator->isValidSignature($requestBody, $signature)) {
            //Log a quick message noting success
            $logger->info('Webhook Signature Verified');

            //Get event dispatcher
            $dispatcher   = $this->get('event_dispatcher');

            //Instantiate a new webhook object with the webhook id, event and payload
            $webhook      = new Webhook($id, $event, $payload);

            //Instantiate a new webhook event
            $webhookEvent = new WebhookEvent($webhook);

            //Switch on the event and dispatch the corresponding event
            switch ($event) {
                case 'signup_success':
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_SIGNUP_SUCCESS, $webhookEvent);
                    break;
                case 'signup_failure';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_SIGNUP_FAILURE, $webhookEvent);
                    break;
                case 'renewal_success';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_RENEWAL_SUCCESS, $webhookEvent);
                    break;
                case 'renewal_failure';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_RENEWAL_FAILURE, $webhookEvent);
                    break;
                case 'payment_success';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_PAYMENT_SUCCESS, $webhookEvent);
                    break;
                case 'payment_failure';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_PAYMENT_FAILURE, $webhookEvent);
                    break;
                case 'billing_date_change';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_BILLING_DATE_CHANGE, $webhookEvent);
                    break;
                case 'subscription_state_change';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_SUBSCRIPTION_STATE_CHANGE, $webhookEvent);
                    break;
                case 'subscription_product_change';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_SUBSCRIPTION_PRODUCT_CHANGE, $webhookEvent);
                    break;
                case 'expiring_card';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_EXPIRING_CARD, $webhookEvent);
                    break;
                case 'customer_update';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_CUSTOMER_UPDATE, $webhookEvent);
                    break;
                case 'component_allocation_change';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_COMPONENT_ALLOCATION_CHANGE, $webhookEvent);
                    break;
                case 'metered_usage';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_METERED_USAGE, $webhookEvent);
                    break;
                case 'upgrade_downgrade_success';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_UPGRADE_DOWNGRADE_SUCCESS, $webhookEvent);
                    break;
                case 'upgrade_downgrade_failure';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_UPGRADE_DOWNGRADE_FAILURE, $webhookEvent);
                    break;
                case 'refund_success';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_REFUND_SUCCESS, $webhookEvent);
                    break;
                case 'refund_failure';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_REFUND_FAILURE, $webhookEvent);
                    break;
                case 'upcoming_renewal_notice';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_UPCOMING_RENEWAL_NOTICE, $webhookEvent);
                    break;
                case 'end_of_trial_notice';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_END_OF_TRIAL_NOTICE, $webhookEvent);
                    break;
                case 'statement_closed';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_STATEMENT_CLOSED, $webhookEvent);
                    break;
                case 'statement_settled';
                    $dispatcher->dispatch(FJLChargifyEvents::WEBHOOK_STATEMENT_SETTLED, $webhookEvent);
                    break;
                default:
                    break;
            }
        } else {
            //Log the invalid webhook
            $logger->error('Received Invalid Webhook');
            $logger->error('Webhook Signature: ' . $signature);
            $logger->error('Generated Signature: ' . $validator->generateSignature($requestBody));
            $logger->error('Webhook Id: ' . $id);
            $logger->error('Webhook Event: ' . $event);
            $logger->error('Webhook Body: ' . $requestBody);
        }

        return new Response();
    }
}