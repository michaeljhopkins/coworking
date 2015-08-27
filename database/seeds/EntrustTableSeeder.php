<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\Permission;

class EntrustTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//Create Roles
        $superadmin = new Role();
		$superadmin->name         = 'superadmin';
		$superadmin->display_name = 'SuperAdmin'; // optional
		$superadmin->description  = 'Technical administrators: developers, webmins, etc'; // optional
		$superadmin->save();

        $admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'Admin'; // optional
		$admin->description  = 'Users with access to the administration panel'; // optional
		$admin->save();


		//Create Permissions
		$view_admin_panel = new Permission();
		$view_admin_panel->name         = 'view-admin-panel';
		$view_admin_panel->display_name = 'View Admin Panel'; // optional
		$view_admin_panel->description  = 'Access to the Admin Panel'; // optional
		$view_admin_panel->save();

		$view_account_permissions = new Permission();
		$view_account_permissions->name         = 'view-account-permissions';
		$view_account_permissions->display_name = 'View Account Permissions'; // optional
		$view_account_permissions->description  = 'Show some demo info on the Admin Dashboard'; // optional
		$view_account_permissions->save();

		$use_file_manager = new Permission();
		$use_file_manager->name         = 'use-file-manager';
		$use_file_manager->display_name = 'Use File Manager'; // optional
		$use_file_manager->description  = 'Access to upload/delete/edit files'; // optional
		$use_file_manager->save();

		$view_backups = new Permission();
		$view_backups->name         = 'view-backups';
		$view_backups->display_name = 'View Backups'; // optional
		$view_backups->description  = 'Access to the Backups Panel'; // optional
		$view_backups->save();

		$make_backups = new Permission();
		$make_backups->name         = 'make-backups';
		$make_backups->display_name = 'Make Backups'; // optional
		$make_backups->description  = 'Access to create new backups'; // optional
		$make_backups->save();

		$download_backups = new Permission();
		$download_backups->name         = 'download-backups';
		$download_backups->display_name = 'Download Backups'; // optional
		$download_backups->description  = 'Access to download existing backups'; // optional
		$download_backups->save();

		$delete_backups = new Permission();
		$delete_backups->name         = 'delete-backups';
		$delete_backups->display_name = 'Delete Backups'; // optional
		$delete_backups->description  = 'Access to delete existing backups'; // optional
		$delete_backups->save();

		$view_logs = new Permission();
		$view_logs->name         = 'view-logs';
		$view_logs->display_name = 'View Logs'; // optional
		$view_logs->save();

		$download_logs = new Permission();
		$download_logs->name         = 'download-logs';
		$download_logs->display_name = 'Download Logs'; // optional
		$download_logs->save();

		$delete_logs = new Permission();
		$delete_logs->name         = 'delete-logs';
		$delete_logs->display_name = 'Delete Logs'; // optional
		$delete_logs->save();

		$preview_logs = new Permission();
		$preview_logs->name         = 'preview-logs';
		$preview_logs->display_name = 'Preview Logs'; // optional
		$preview_logs->save();

		$superadmin->attachPermissions(array(
			$view_admin_panel, 
			$view_account_permissions, 
			$use_file_manager, 
			$view_backups, 
			$make_backups, 
			$download_backups, 
			$delete_backups, 
			$view_logs, 
			$download_logs, 
			$delete_logs, 
			$preview_logs
		));

		$admin->attachPermissions(array(
			$view_admin_panel, 
			$use_file_manager
		));
    }
}
