-- Cria usuario base
insert into usuario (id_usuario, nome, email, senha, tipo, status) values (-1, 'maquina', 'm@m.com', md5('123456'), 0, 1);
insert into usuario (nome, email, senha, tipo, status) values ('Gustavo', 'gubezerra@hotmail.com', md5('123456'), 1, 1);

-- cria servidor
insert into servidor (nome, temporada, rodada, status) values ('Servidor Teste 1', 2020, 0, 1);

-- script inclusao usuario no servidor
insert into servidor_usuario (id_servidor, id_usuario) values (1,1);

