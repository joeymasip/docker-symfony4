<?php
/**
 * Created by PhpStorm.
 * User: Geoffrey Lopez
 * Date: 10/12/2018
 * Time: 23:25
 */

namespace  App\Form\Handler;

use App\Entity\User;
use App\Model\User as UserModel;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\ORMException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserHandler {
    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * @var LoggerInterface
     */
    private $loggerInterface;

    public function __construct(ObjectManager $objectManager, LoggerInterface $loggerInterface)
    {
        $this->objectManager = $objectManager;
        $this->loggerInterface = $loggerInterface;
    }

    public function handle(FormInterface $form, Request $request, UserPasswordEncoderInterface $encoder)
    {
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            /**
             * @var UserModel $userModel
             */
            $userModel = $form->getData();

            /**
             * @var User $user
             */
            $user = new User();
            $user->setEmail($userModel->email);
            $passEncoded = $encoder->encodePassword($user, $userModel->password);
            $user->setPassword($passEncoded);
            $user->setRoles(['ROLE_USER']);

            try{
                $this->objectManager->persist($user);
            } catch (ORMException $e){
                $this->loggerInterface->error($e->getMessage());
                $form->addError(new FormError('Erreur lors de l\'insertion en BDD du user...'));
                return false;
            }

            $this->objectManager->flush();
            return true;
        }
        return false;
    }
}