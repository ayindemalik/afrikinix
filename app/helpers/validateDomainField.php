<?php
// user to validate users information
$domf_table = 'domain_fields';
function validateDomainField($domain_f) // $user will replace $_POST
{
  $errors = array();
  if (empty($domain_f["domain_name"])){
    array_push($errors, 'Domain field name is required');
  }
  $existingDomainName = selectOne('domain_fields', ['domain_name'=>$domain_f['domain_name']]);
  if($existingDomainName){
    if (isset($domain_f["update_domain_name"]) && $existingDomainName["domain_id"] != $topic["domain_id"]){
      array_push($errors, "Domain field's already exist");
    }

    if (isset($domain_f["save_domain_field"])){
      array_push($errors, "Domain field's already exist");
    }
  }
  return $errors;
}
