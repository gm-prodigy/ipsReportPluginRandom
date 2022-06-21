<?php
/**
 * @brief		supportDepartment Extra
 * @author		Gm Prodigy
 * @since		23 Aug 2020
 */

namespace IPS\multitrucking\api;

/* To prevent PHP errors (extending class does not exist) revealing path */

use mysql_xdevapi\Exception;

if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

class _supportdepartment extends \IPS\Api\Controller
{
	/**
	 * GET /multitrucking/supportdepartment
	 * Get list of all Support Department.
	 *
	 * @return array|\IPS\Api\Response
	 * @apiresponse	string	supportDepartment	All Department Name and ID
	 */
	public function GETindex()
	{
        $departments = [];

        try{
            foreach ( \IPS\nexus\Support\Department::departmentsWithPermission() as $department )
            {
            array_push($departments,  array(
                'department_name' => $department->_title,
                'department_id' => $department->_id,
            ));
//                $departments[ $department->_id ] = $department->_title;
            }
        }catch (Exception $exception){
            return $departments = [];
        }

		return new \IPS\Api\Response( 200, array(
			'supportdepartments'	=> $departments
        ) );
	}
}