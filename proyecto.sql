Create table directores(
cod_dir varchar(10) primary key,
dni int not null,
nomb_dir varchar(20) not null,
ape_dir varchar(20) not null);

Create table proyectos(
cod_proye varchar(10) primary key,
estado varchar(50),
descripcion varchar(100) not null,
fecha_pro date,
nomb_proye varchar(50) not null),
cod_dir varchar(10) not null;

Alter table proyectos add constraint fk_cod_dir FOREIGN KEY(cod_dir) references directores(cod_dir);

Create or replace function Estado_pro () returns trigger as $$
DECLARE
begin
	IF NEW.estado is null then
	NEW.estado:='Propuesta';
	end if;
	return new;
	end;
	$$Language plpgsql;

Create trigger Va_est Before insert or update on proyectos for each row execute procedure Estado_pro();


Create table estudiantes(
cod_est varchar(10) primary key,
dni int not null,
nomb_est varchar(20) not null,
ape_est varchar(20) not null,
cod_proye varchar(20));

Alter table estudiantes add contraint fk_cod_proye FOREIGN KEY(cod_proye) references proyectos(cod_proye);

Create table jurados(
cod_jur varchar(10) primary key,
dni int not null,
nomb_jur varchar(20) not null,
ape_jur varchar(20) not null);

Create table recintos(
cod_rec varchar(20) primary key,
nomb_rec varchar(30) not null,
direccion varchar(30) not null);

Create table sustentaciones(
veredicto varchar(100),
fecha_pre date,
cod_proye varchar(10) unique,
cod_jur varchar(10),
razon varchar(100),
cod_rec varchar(20),
primary key(cod_proye, cod_jur));

Alter table sustentaciones add constraint fk_cod_proye FOREIGN KEY(cod_proye) references proyectos(cod_proye);
alter table sustentaciones add constraint fk_cod_jur FOREIGN KEY(cod_jur) references jurados(cod_jur);