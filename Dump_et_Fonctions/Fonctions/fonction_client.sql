create or replace function ajouter_client(text,text,text,date,text,text,text) returns integer
as
'
declare f_nom alias for $1;
declare f_prenom alias for $2;
declare f_adresse alias for $3;
declare f_datenaiss alias for $4;
declare f_login alias for $5;
declare f_password alias for $6;
declare f_email alias for $7;
declare id integer;
declare retour integer;

begin 
select into id clienid from client where nom=f_nom and prenom=f_prenom and adresse=f_adresse and datenaiss=f_datenaiss and login=f_login and password=f_password and email=f_email;
if not found then
	retour=-1;
	insert into client(nom,prenom,adresse,datenaiss,login,password,email) values(f_nom,f_prenom,f_adresse,f_datenaiss,f_login,f_password,f_email);
	select into id clienid from client where nom=f_nom and prenom=f_prenom and adresse=f_adresse and datenaiss=f_datenaiss and login=f_login and password=f_password and email=f_email;
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