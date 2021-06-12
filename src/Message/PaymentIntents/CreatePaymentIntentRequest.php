<?php

/**
 * Stripe Payment Intents Create Request.
 */
namespace Omnipay\Stripe\Message\PaymentIntents;

/**
 * Stripe Create Payment Intent Request.
 *
 * <code>
 *   $paymentIntent = $gateway->create([
 *	 	'amount' => 20000,
 *	 	'currency' => 'usd'
 *	 
 *	 ]);
 *
 *   $response = $paymentIntent->send();
 *
 * </code>
 *
 * @link https://stripe.com/docs/api/payment_intents/create
 */
class CreatePaymentIntentRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    public function getData()
    {
        $this->validate('amount', 'currency');
        
        $data = [];

        $data['amount'] = $this->getAmountInteger();
        $data['currency'] = strtolower($this->getCurrency());
        
        return $data;
    }

    /**
     * @inheritdoc
     */
    public function getEndpoint()
    {
        return $this->endpoint.'/payment_intents';
    }

    /**
     * @inheritdoc
     */
    protected function createResponse($data, $headers = [])
    {
        return $this->response = new Response($this, $data, $headers);
    }
}
