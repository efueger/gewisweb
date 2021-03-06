<?php

namespace Decision\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController
{

    /**
     * Notes upload action.
     */
    public function notesAction()
    {
        $service = $this->getDecisionService();
        $request = $this->getRequest();

        if ($request->isPost()) {
            if ($service->uploadNotes($request->getPost(), $request->getFiles())) {
                return new ViewModel(array(
                    'success' => true
                ));
            }
        }

        return new ViewModel(array(
            'form' => $service->getNotesForm()
        ));
    }

    /**
     * Document upload action.
     */
    public function documentAction()
    {
        $service = $this->getDecisionService();
        $request = $this->getRequest();

        if ($request->isPost()) {
            if ($service->uploadDocument($request->getPost(), $request->getFiles())) {
                return new ViewModel(array(
                    'success' => true
                ));
            }
        }

        return new ViewModel(array(
            'form' => $service->getDocumentForm()
        ));
    }

    /**
     * Get the decision service.
     */
    public function getDecisionService()
    {
        return $this->getServiceLocator()->get('decision_service_decision');
    }

}
