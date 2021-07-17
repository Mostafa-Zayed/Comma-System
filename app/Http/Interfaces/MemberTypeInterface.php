<?php
namespace App\Http\Interfaces;

interface MemberTypeInterface
{
    public function indexMemberType();
    public function showMemberType($id);
    public function createMemberType();
    public function storeMemberType($request);
    public function editMemberType($id);
    public function updateMemberType($request,$id);
    public function destroyMemberType($id);
}
