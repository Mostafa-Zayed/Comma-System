<?php
namespace App\Http\Interfaces;

interface MemberInterface
{
public function indexMember();
public function showMember($id);
public function createMember();
public function storeMember($request);
public function editMember($id);
public function updateMember($request,$id);
public function destroyMember($id);
}
