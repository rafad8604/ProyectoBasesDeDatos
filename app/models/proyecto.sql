create table estudiantes(
cod_est varchar(10) primary key,
nomb_est varchar(20) not null,
ape_est varchar(20) not null,
cod_propu varchar(20)
);

create table propuestas(
cod_propu varchar(10) primary key,
descripcion varchar(100) not null,
fecha_pro date not null);

ALTER TABLE propuestas ADD CONSTRAINT fk_cod_est FOREIGN KEY(cod_est) REFERENCES estudiantes(cod_est);
ALTER TABLE estudiantes ADD CONSTRAINT fk_cod_propu FOREIGN KEY(cod_propu) REFERENCES propuestas(cod_propu)

create table directores(
cod_dir varchar(10) primary key,
nomb_dir varchar(20) not null,
ape_dir varchar(20) not null);

create table jurados(
cod_jur varchar(10) primary key,
nomb_jur varchar(20) not null,
ape_jur varchar(20) not null);

create table proyectos(
cod_proye varchar(10) primary key,
cod_dir varchar(10) not null,
descripcion varchar(100) not null);

alter table proyectos add constraint fk_cod_dir FOREIGN KEY(cod_dir) references directores(cod_dir);
alter table proyectos add constraint fk_cod_propu FOREIGN KEY(cod_propu) references propuestas(cod_propu);

create table sustentaciones(
recinto varchar(20) DEFAULT 'No Asignado',
veredicto varchar(100),
fecha_pre date,
cod_proye varchar(10) unique,
cod_jur varchar(10),
primary key(cod_proye, cod_jur));

alter table sustentaciones add constraint fk_cod_proye FOREIGN KEY(cod_proye) references proyectos(cod_proye);
alter table sustentaciones add constraint fk_cod_jur FOREIGN KEY(cod_jur) references jurados(cod_jur);

INSERTAR DATOS

insert into estudiantes(cod_est, nomb_est, ape_est) values ('160004540', 'Juan', 'Romero'), ('160004539', 'Brian', 'Duran'), ('160004538', 'Andres', 'Rodriguez');

insert into propuestas(cod_propu, descripcion, fecha_pro)
values ('propu1', 'Biologia', '2023-01-01'),
('propu2', 'Informatica', '2022-06-06'),
('propu3', 'Matematica', '2021-12-31');

insert into directores(cod_dir, nomb_dir, ape_dir)
values ('dir1', 'Jesus', 'Carvajal'),
('dir2', 'Marco', 'Gutierrez'),
('dir3', 'Diana', 'Cardona');

insert into jurados(cod_jur, nomb_jur, ape_jur)
values ('jur1', 'Jesus', 'Arias'),
('jur2', 'Yenny', 'Garcia'),
('jur3', 'Javier', 'Mancera');

insert into proyectos(cod_proye, cod_dir, cod_propu, descripcion)
values ('proy1', 'dir1', 'propu1', 'Biologia-Sebas'),
('proy2', 'dir2', 'propu2', 'Informatica-Brian'),
('proy3', 'dir3', 'propu3', 'Matematica-Andres');

insert into sustentaciones(veredicto, fecha_pre, cod_proye, cod_dir)
values ('si', '2024-01-01', 'proy1', 'dir1'),
('no', '2023-01-01', 'proy2', 'dir2'),
('si', '2022-01-01', 'proy3', 'dir3');



COSAS QUE FALTAN

EVITAR QUE SE BORREN LOS DATOS EN CASCADA
FECHA PROPU = FECHA PRE DEBERIAN SER IGUALES?(FECHA PRE > FECHA PRO)