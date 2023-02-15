<?php
namespace App\Traits;
use App\Models\Role;

trait UserHelpers
{

  /**
   * Check for multiple roles.
   * 
   * @return Boolean
   */

  public function hasMultipleRoles()
  {
    return $this->roles->count() > 1 ? TRUE : FALSE;
  }

  /**
  * Check for a single role by role.
  * 
  * @param Role $role
  * @return Boolean
  */

  public function hasRole(Role $role)
  {
    return $this->roles->contains($role->id);
  }

  /**
  * Check for at least one role by an array of roles
  * 
  * @param Array $roles
  * @return Boolean
  */

  public function hasAtLeastOneRole($roles)
  {
    foreach($roles as $role)
    {
      $r = Role::where('key', $role)->firstOrFail();
      if ($this->roles->contains($r->id))
      {
        return TRUE;
      }
    }
    return FALSE;
  }

  /**
  * Check for an admin
  * 
  * @return Boolean
  */

  public function isAdmin()
  {
    return $this->roles->contains(Role::ADMIN);
  }

  /**
  * Check for an editor
  * 
  * @return Boolean
  */

  public function isEditor()
  {
  return $this->roles->contains(Role::EDITOR);
  }
}