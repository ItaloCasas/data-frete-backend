CREATE DATABASE data_frete;

create table distancia (
	id int auto_increment,
    cep_ori int,
    cep_des int,
    dist_calculada float,
    dt_cadastro datetime,
    dt_alteracao datetime,
    primary key(id)
);