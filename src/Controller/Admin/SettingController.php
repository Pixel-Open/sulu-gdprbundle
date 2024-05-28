<?php

declare(strict_types=1);

namespace Pixel\GDPRBundle\Controller\Admin;

use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\View\ViewHandlerInterface;
use HandcraftedInTheAlps\RestRoutingBundle\Controller\Annotations\RouteResource;
use HandcraftedInTheAlps\RestRoutingBundle\Routing\ClassResourceInterface;
use Pixel\GDPRBundle\Entity\Setting;
use Sulu\Component\Rest\AbstractRestController;
use Sulu\Component\Security\SecuredControllerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * @RouteResource("gdpr-settings")
 */
class SettingController extends AbstractRestController implements ClassResourceInterface, SecuredControllerInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager,
        ViewHandlerInterface $viewHandler,
        ?TokenStorageInterface $tokenStorage = null
    ) {
        $this->entityManager = $entityManager;
        parent::__construct($viewHandler, $tokenStorage);
    }

    public function getAction(): Response
    {
        $applicationSetting = $this->entityManager->getRepository(Setting::class)->findOneBy([]);
        return $this->handleView($this->view($applicationSetting ?: new Setting()));
    }

    public function putAction(Request $request): Response
    {
        $applicationSetting = $this->entityManager->getRepository(Setting::class)->findOneBy([]);
        if (!$applicationSetting) {
            $applicationSetting = new Setting();
            $this->entityManager->persist($applicationSetting);
        }
        $this->mapDataToEntity($request->request->all(), $applicationSetting);
        $this->entityManager->flush();
        return $this->handleView($this->view($applicationSetting));
    }

    /**
     * @param array<mixed> $data
     */
    public function mapDataToEntity(array $data, Setting $entity): void
    {
        $googleTagManager = $data['googleTagManager'] ?? null;
        $googleAnalyticsGtagJs = $data['googleAnalyticsGtagJs'] ?? null;
        $bingAds = $data['bingAds'] ?? null;
        $pixelFacebook = $data['pixelFacebook'] ?? null;
        $googleAds = $data['googleAds'] ?? null;
        $useCookieHandling = $data['useCookieHandling'] ?? null;
        $privacyUrl = $data['privacyUrl'] ?? "";
        $bodyPosition = $data['bodyPosition'] ?? "bottom";
        $hashtag = $data['hashtag'] ?? "#tarteaucitron";
        $cookieName = $data['cookieName'] ?? "tarteaucitron";
        $orientation = $data['orientation'] ?? "middle";
        $groupServeices = $data['groupServices'] ?? false;
        $showAlertSmall = $data['showAlertSmall'] ?? false;
        $cookielist = $data['cookielist'] ?? false;
        $closePopup = $data['closePopup'] ?? false;
        $showIcon = $data['showIcon'] ?? true;
        $iconPosition = $data['iconPosition'] ?? "BottomRight";
        $adblocker = $data['adblocker'] ?? false;
        $denyAllCta = $data['denyAllCta'] ?? true;
        $acceptAllCta = $data['acceptAllCta'] ?? true;
        $highPrivacy = $data['highPrivacy'] ?? true;
        $handleBrowserDNTRequest = $data['handleBrowserDNTRequest'] ?? false;
        $removeCredit = $data['removeCredit'] ?? true;
        $moreInfoLink = $data['moreInfoLink'] ?? true;
        $useExternalCss = $data['useExternalCss'] ?? false;
        $useExternalJs = $data['useExternalJs'] ?? false;
        $readmoreLink = $data['readmoreLink'] ?? "";
        $mandatory = $data['mandatory'] ?? true;
        $mandatoryCta = $data['mandatoryCta'] ?? true;

        $entity->setGoogleTagManager($googleTagManager);
        $entity->setGoogleAnalyticsGtagJs($googleAnalyticsGtagJs);
        $entity->setBingAds($bingAds);
        $entity->setPixelFacebook($pixelFacebook);
        $entity->setGoogleAds($googleAds);
        $entity->setUseCookieHandling($useCookieHandling);
        $entity->setPrivacyUrl($privacyUrl);
        $entity->setBodyPosition($bodyPosition);
        $entity->setHashtag($hashtag);
        $entity->setCookieName($cookieName);
        $entity->setOrientation($orientation);
        $entity->setGroupServices($groupServeices);
        $entity->setShowAlertSmall($showAlertSmall);
        $entity->setCookielist($cookielist);
        $entity->setClosePopup($closePopup);
        $entity->setShowIcon($showIcon);
        $entity->setIconPosition($iconPosition);
        $entity->setAdblocker($adblocker);
        $entity->setDenyAllCta($denyAllCta);
        $entity->setAcceptAllCta($acceptAllCta);
        $entity->setHighPrivacy($highPrivacy);
        $entity->setHandleBrowserDNTRequest($handleBrowserDNTRequest);
        $entity->setRemoveCredit($removeCredit);
        $entity->setMoreInfoLink($moreInfoLink);
        $entity->setUseExternalCss($useExternalCss);
        $entity->setUseExternalJs($useExternalJs);
        $entity->setReadmoreLink($readmoreLink);
        $entity->setMandatory($mandatory);
        $entity->setMandatoryCta($mandatoryCta);
    }

    public function getSecurityContext()
    {
        return Setting::SECURITY_CONTEXT;
    }
}
