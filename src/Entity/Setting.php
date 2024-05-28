<?php

namespace Pixel\GDPRBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Sulu\Component\Persistence\Model\AuditableInterface;
use Sulu\Component\Persistence\Model\AuditableTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="gdpr_settings")
 * @Serializer\ExclusionPolicy("all")
 */
class Setting implements AuditableInterface
{
    use AuditableTrait;

    public const RESOURCE_KEY = "gdpr_settings";
    public const FORM_KEY = "gdpr_settings";
    public const SECURITY_CONTEXT = "gdpr_settings.settings";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Serializer\Expose()
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Serializer\Expose()
     */
    private ?string $googleTagManager = null;


    /**
     * @ORM\Column(type="string", nullable=true)
     * @Serializer\Expose()
     */
    private ?string $googleAnalyticsGtagJs = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Serializer\Expose()
     */
    private ?string $bingAds = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Serializer\Expose()
     */
    private ?string $pixelFacebook = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Serializer\Expose()
     */
    private ?string $googleAds = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $useCookieHandling = false;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Serializer\Expose()
     */
    private ?string $privacyUrl = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Serializer\Expose()
     */
    private ?string $bodyPosition = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Serializer\Expose()
     */
    private ?string $hashtag = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Serializer\Expose()
     */
    private ?string $cookieName = null;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Serializer\Expose()
     */
    private ?string $orientation = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $groupServices = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $showAlertSmall = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $cookielist = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $closePopup = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $showIcon = true;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Serializer\Expose()
     */
    private ?string $iconPosition = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $adblocker = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $denyAllCta = true;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $acceptAllCta = true;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $highPrivacy = true;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $handleBrowserDNTRequest = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $removeCredit = true;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $moreInfoLink = true;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $useExternalCss = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $useExternalJs = false;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Serializer\Expose()
     */
    private ?string $readmoreLink = null;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $mandatory = true;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Serializer\Expose()
     */
    private ?bool $mandatoryCta = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoogleTagManager(): ?string
    {
        return $this->googleTagManager;
    }

    public function setGoogleTagManager(?string $googleTagManager): void
    {
        $this->googleTagManager = $googleTagManager;
    }

    public function getGoogleAnalyticsGtagJs(): ?string
    {
        return $this->googleAnalyticsGtagJs;
    }

    public function setGoogleAnalyticsGtagJs(?string $googleAnalyticsGtagJs): void
    {
        $this->googleAnalyticsGtagJs = $googleAnalyticsGtagJs;
    }

    public function getPixelFacebook(): ?string
    {
        return $this->pixelFacebook;
    }

    public function setPixelFacebook(?string $pixelFacebook): void
    {
        $this->pixelFacebook = $pixelFacebook;
    }

    public function getUseCookieHandling(): ?bool
    {
        return $this->useCookieHandling;
    }

    public function setUseCookieHandling(?bool $useCookieHandling): void
    {
        $this->useCookieHandling = $useCookieHandling;
    }

    public function getPrivacyUrl(): ?string
    {
        return $this->privacyUrl;
    }

    public function setPrivacyUrl(?string $privacyUrl): void
    {
        $this->privacyUrl = $privacyUrl;
    }

    public function getBodyPosition(): ?string
    {
        return $this->bodyPosition;
    }

    public function setBodyPosition(?string $bodyPosition): void
    {
        $this->bodyPosition = $bodyPosition;
    }

    public function getHashtag(): ?string
    {
        return $this->hashtag;
    }

    public function setHashtag(?string $hashtag): void
    {
        $this->hashtag = $hashtag;
    }

    public function getCookieName(): ?string
    {
        return $this->cookieName;
    }

    public function setCookieName(?string $cookieName): void
    {
        $this->cookieName = $cookieName;
    }

    public function getOrientation(): ?string
    {
        return $this->orientation;
    }

    public function setOrientation(?string $orientation): void
    {
        $this->orientation = $orientation;
    }

    public function getGroupServices(): ?bool
    {
        return $this->groupServices;
    }

    public function setGroupServices(?bool $groupServices): void
    {
        $this->groupServices = $groupServices;
    }

    public function getShowAlertSmall(): ?bool
    {
        return $this->showAlertSmall;
    }

    public function setShowAlertSmall(?bool $showAlertSmall): void
    {
        $this->showAlertSmall = $showAlertSmall;
    }

    public function getCookielist(): ?bool
    {
        return $this->cookielist;
    }

    public function setCookielist(?bool $cookielist): void
    {
        $this->cookielist = $cookielist;
    }

    public function getClosePopup(): ?bool
    {
        return $this->closePopup;
    }

    public function setClosePopup(?bool $closePopup): void
    {
        $this->closePopup = $closePopup;
    }

    public function getShowIcon(): ?bool
    {
        return $this->showIcon;
    }

    public function setShowIcon(?bool $showIcon): void
    {
        $this->showIcon = $showIcon;
    }

    public function getIconPosition(): ?string
    {
        return $this->iconPosition;
    }

    public function setIconPosition(?string $iconPosition): void
    {
        $this->iconPosition = $iconPosition;
    }

    public function getAdblocker(): ?bool
    {
        return $this->adblocker;
    }

    public function setAdblocker(?bool $adblocker): void
    {
        $this->adblocker = $adblocker;
    }

    public function getDenyAllCta(): ?bool
    {
        return $this->denyAllCta;
    }

    public function setDenyAllCta(?bool $denyAllCta): void
    {
        $this->denyAllCta = $denyAllCta;
    }

    public function getAcceptAllCta(): ?bool
    {
        return $this->acceptAllCta;
    }

    public function setAcceptAllCta(?bool $acceptAllCta): void
    {
        $this->acceptAllCta = $acceptAllCta;
    }

    public function getHighPrivacy(): ?bool
    {
        return $this->highPrivacy;
    }

    public function setHighPrivacy(?bool $highPrivacy): void
    {
        $this->highPrivacy = $highPrivacy;
    }

    public function getHandleBrowserDNTRequest(): ?bool
    {
        return $this->handleBrowserDNTRequest;
    }

    public function setHandleBrowserDNTRequest(?bool $handleBrowserDNTRequest): void
    {
        $this->handleBrowserDNTRequest = $handleBrowserDNTRequest;
    }

    public function getRemoveCredit(): ?bool
    {
        return $this->removeCredit;
    }

    public function setRemoveCredit(?bool $removeCredit): void
    {
        $this->removeCredit = $removeCredit;
    }

    public function getMoreInfoLink(): ?bool
    {
        return $this->moreInfoLink;
    }

    public function setMoreInfoLink(?bool $moreInfoLink): void
    {
        $this->moreInfoLink = $moreInfoLink;
    }

    public function getUseExternalCss(): ?bool
    {
        return $this->useExternalCss;
    }

    public function setUseExternalCss(?bool $useExternalCss): void
    {
        $this->useExternalCss = $useExternalCss;
    }

    public function getUseExternalJs(): ?bool
    {
        return $this->useExternalJs;
    }

    public function setUseExternalJs(?bool $useExternalJs): void
    {
        $this->useExternalJs = $useExternalJs;
    }

    public function getReadmoreLink(): ?string
    {
        return $this->readmoreLink;
    }

    public function setReadmoreLink(?string $readmoreLink): void
    {
        $this->readmoreLink = $readmoreLink;
    }

    public function getMandatory(): ?bool
    {
        return $this->mandatory;
    }

    public function setMandatory(?bool $mandatory): void
    {
        $this->mandatory = $mandatory;
    }

    public function getMandatoryCta(): ?bool
    {
        return $this->mandatoryCta;
    }

    public function setMandatoryCta(?bool $mandatoryCta): void
    {
        $this->mandatoryCta = $mandatoryCta;
    }

    public function getGoogleAds(): ?string
    {
        return $this->googleAds;
    }

    public function setGoogleAds(?string $googleAds): void
    {
        $this->googleAds = $googleAds;
    }

    public function getBingAds(): ?string
    {
        return $this->bingAds;
    }

    public function setBingAds(?string $bingAds): void
    {
        $this->bingAds = $bingAds;
    }
}
