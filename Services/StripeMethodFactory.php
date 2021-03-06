<?php

/*
 * This file is part of the PaymentSuite package.
 *
 * Copyright (c) 2013-2016 Marc Morera
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 */

namespace PaymentSuite\StripeBundle\Services;

use PaymentSuite\StripeBundle\Services\Interfaces\StripeSettingsProviderInterface;
use PaymentSuite\StripeBundle\StripeMethod;

/**
 * Class StripeMethodFactory.
 */
class StripeMethodFactory
{
    /**
     * @var StripeSettingsProviderInterface
     */
    private $settingsProvider;

    /**
     * StripeMethodFactory constructor.
     *
     * @param StripeSettingsProviderInterface $settingsProvider
     */
    public function __construct(StripeSettingsProviderInterface $settingsProvider)
    {
        $this->settingsProvider = $settingsProvider;
    }

    /**
     * Given some data, creates a StripeMethod object.
     *
     * @param string $apiToken                  Api token
     * @param string $creditCardNumber          Credit card number
     * @param string $creditCardOwner           Credit card owner
     * @param string $creditCardExpirationYear  Credit card expiration year
     * @param string $creditCardExpirationMonth Credit card expiration month
     * @param string $creditCardSecurity        Credit card security
     *
     * @return StripeMethod StripeMethod instance
     */
    public function create(
        $apiToken,
        $creditCardNumber,
        $creditCardOwner,
        $creditCardExpirationYear,
        $creditCardExpirationMonth,
        $creditCardSecurity
    ) {
        return new StripeMethod(
            $this->settingsProvider->getPaymentName(),
            $apiToken,
            $creditCardNumber,
            $creditCardOwner,
            $creditCardExpirationYear,
            $creditCardExpirationMonth,
            $creditCardSecurity
        );
    }
}
