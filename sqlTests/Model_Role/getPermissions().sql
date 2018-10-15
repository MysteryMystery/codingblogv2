select permissions.id, permissions.node from roles
inner join permission_roles on roles.id=permission_roles.role_id
inner join permissions on permission_roles.permission_id=permissions.id
where roles.name = 'Site Owner';