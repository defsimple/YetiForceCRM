<?php
/* +***********************************************************************************************************************************
 * The contents of this file are subject to the YetiForce Public License Version 1.1 (the "License"); you may not use this file except
 * in compliance with the License.
 * Software distributed under the License is distributed on an "AS IS" basis, WITHOUT WARRANTY OF ANY KIND, either express or implied.
 * See the License for the specific language governing rights and limitations under the License.
 * The Original Code is YetiForce.
 * The Initial Developer of the Original Code is YetiForce. Portions created by YetiForce are Copyright (C) www.yetiforce.com. 
 * All Rights Reserved.
 * *********************************************************************************************************************************** */

class Settings_Users_SaveAjax_Action extends Settings_Vtiger_IndexAjax_View
{

	function __construct()
	{
		parent::__construct();
		$this->exposeMethod('updateConfig');
		$this->exposeMethod('saveSwitchUsers');
	}

	public function updateConfig(Vtiger_Request $request)
	{
		$param = $request->get('param');
		$recordModel = Settings_Users_Module_Model::getInstance();
		$response = new Vtiger_Response();
		$response->setResult(array(
			'success' => $recordModel->setConfig($param),
			'message' => vtranslate('LBL_SAVE_CONFIG', $request->getModule(false))
		));
		$response->emit();
	}
	
	public function saveSwitchUsers(Vtiger_Request $request)
	{
		$param = $request->get('param');
		$moduleModel = Settings_Users_Module_Model::getInstance();
		$moduleModel->saveSwitchUsers($param);
		$response = new Vtiger_Response();
		$response->setResult(array(
			'message' => vtranslate('LBL_SAVE_CONFIG', $request->getModule(false))
		));
		$response->emit();
	}
}
