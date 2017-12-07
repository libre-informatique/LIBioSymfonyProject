<?php

/*
 * This file is part of the Lisem Project.
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SeedBatchBundle\Entity;

use Blast\Bundle\BaseEntitiesBundle\Entity\Traits\BaseEntity;
use Blast\Bundle\BaseEntitiesBundle\Entity\Traits\Descriptible;
use Blast\Bundle\BaseEntitiesBundle\Entity\Traits\Timestampable;

/**
 * Certification.
 */
class Certification
{
    use BaseEntity,
        Timestampable,
        Descriptible
    ;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var \DateTime
     */
    protected $certificationDate;

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var \DateTime
     */
    protected $expiryDate;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \SeedBatchBundle\Entity\CertificationType
     */
    protected $certificationType;

    /**
     * @var \SeedBatchBundle\Entity\CertifyingBody
     */
    protected $certifyingBody;

    /**
     * @var \SeedBatchBundle\Entity\Plot
     */
    protected $plot;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->initCollections();
    }

    // implementation of __clone for duplication
    public function __clone()
    {
        $this->id = null;
        $this->code = null;
        $this->initCollections();
    }

    public function initCollections()
    {
    }

    /**
     * Set code.
     *
     * @param string $code
     *
     * @return Certification
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set certificationDate.
     *
     * @param \DateTime $certificationDate
     *
     * @return Certification
     */
    public function setCertificationDate($certificationDate)
    {
        $this->certificationDate = $certificationDate;

        return $this;
    }

    /**
     * Get certificationDate.
     *
     * @return \DateTime
     */
    public function getCertificationDate()
    {
        return $this->certificationDate;
    }

    /**
     * Set startDate.
     *
     * @param \DateTime $startDate
     *
     * @return Certification
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set expiryDate.
     *
     * @param \DateTime $expiryDate
     *
     * @return Certification
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /**
     * Get expiryDate.
     *
     * @return \DateTime
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Certification
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set certificationType.
     *
     * @param \SeedBatchBundle\Entity\CertificationType $certificationType
     *
     * @return Certification
     */
    public function setCertificationType(CertificationType $certificationType = null)
    {
        $this->certificationType = $certificationType;

        return $this;
    }

    /**
     * Get certificationType.
     *
     * @return \SeedBatchBundle\Entity\CertificationType
     */
    public function getCertificationType()
    {
        return $this->certificationType;
    }

    /**
     * Set plot.
     *
     * @param \SeedBatchBundle\Entity\Plot $plot
     *
     * @return Certification
     */
    public function setPlot(\SeedBatchBundle\Entity\Plot $plot = null)
    {
        $this->plot = $plot;

        return $this;
    }

    /**
     * Get plot.
     *
     * @return \SeedBatchBundle\Entity\Plot
     */
    public function getPlot()
    {
        return $this->plot;
    }

    /**
     * Set certifyingBody.
     *
     * @param \SeedBatchBundle\Entity\CertifyingBody $certifyingBody
     *
     * @return Certification
     */
    public function setCertifyingBody(\SeedBatchBundle\Entity\CertifyingBody $certifyingBody = null)
    {
        $this->certifyingBody = $certifyingBody;

        return $this;
    }

    /**
     * Get certifyingBody.
     *
     * @return \SeedBatchBundle\Entity\CertifyingBody
     */
    public function getCertifyingBody()
    {
        return $this->certifyingBody;
    }
}
