create or replace function ajouter_admin(text,text,integer) returns integer
as
'
declare f_login alias for $1;
declare f_password alias for $2;
declare f_statut alias for $3;
declare id integer;
declare retour integer;

begin 
select into id id_admin from admin where login=f_login and password=f_password and statut=f_statut;
if not found then
	retour=-1;
	insert into admin(login,password,statut) values(f_login,f_password,f_statut);
	select into id id_admin from admin where login=f_login and password=f_password and statut=f_statut;
if not found then 
retour =0;
else
 retour =1;
 end if;
 else
 retour=2;
 end if;
 return retour;
 end;
'
language 'plpgsql';