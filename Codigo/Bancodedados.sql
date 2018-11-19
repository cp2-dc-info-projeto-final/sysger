CREATE TABLE Cliente (

		idCliente INT UNSIGNED AUTO_INCREMENT NOT NULL,
		nome VARCHAR(30) NOT NULL,
		senha VARCHAR(60) NOT NULL,
		endereco VARCHAR(500),
		telefone INT,
		dataNasc DATE,
		email VARCHAR(100),
		PRIMARY KEY(IdCliente)

		);

CREATE TABLE Pessoa_Fisica (

		id_PF INT UNSIGNED NOT NULL,
		cpf VARCHAR(100) NOT NULL,
    PRIMARY KEY(Id_PF),
   	FOREIGN KEY (Id_PF) REFERENCES Cliente(IdCliente)

		);

CREATE TABLE Pessoa_Juridica (

		id_PJ INT UNSIGNED NOT NULL,
		cnpj VARCHAR(100) NOT NULL,
    PRIMARY KEY(Id_PJ),
   	FOREIGN KEY (Id_PJ) REFERENCES Cliente(IdCliente)

		);


CREATE TABLE Gerenciamento (

				idGerenciamento INT UNSIGNED AUTO_INCREMENT NOT NULL,
				nome VARCHAR(30) NOT NULL,
				senha VARCHAR(60) NOT NULL,
				endereco VARCHAR(500),
				telefone INT,
				dataNasc DATE,
				email VARCHAR(100),
				cpf VARCHAR(100) NOT NULL,
				PRIMARY KEY(IdGerenciamento)

				);


CREATE TABLE Servico (

		idServico INT UNSIGNED AUTO_INCREMENT NOT NULL,
		valor DOUBLE NOT NULL,
		diaVenc INT NOT NULL,
		dataContrato DATE,
    IdCliente INT UNSIGNED NOT NULL,
    IdGerenciamento INT UNSIGNED NOT NULL,
		PRIMARY KEY(IdServico),
		FOREIGN KEY (IdCliente) REFERENCES Cliente(IdCliente),
		FOREIGN KEY (IdGerenciamento) REFERENCES Gerenciamento(IdGerenciamento)

		);

CREATE TABLE Pagamento (

						idPagamento INT UNSIGNED AUTO_INCREMENT NOT NULL,
						dataVencimento DATE,
						dataPago DATE,
						idServico INT UNSIGNED NOT NULL,
						valor DOUBLE,
						FOREIGN KEY (idServico) REFERENCES Servico(idServico),
						PRIMARY KEY(IdPagamento)

						);

CREATE TABLE Celular (

		idCelular INT UNSIGNED AUTO_INCREMENT NOT NULL,
		numero VARCHAR(30) NOT NULL,
		email VARCHAR(100),
    IdServico INT UNSIGNED NOT NULL,
		PRIMARY KEY(IdCelular),
		FOREIGN KEY (IdServico) REFERENCES Servico(IdServico)

		);

CREATE TABLE Veiculo (

		idVeiculo INT UNSIGNED AUTO_INCREMENT NOT NULL,
		marca VARCHAR(30),
		modelo VARCHAR(30),
		tiposervico VARCHAR(30),
		placa VARCHAR(30),
		cor VARCHAR(30),
		ano DATE,
		numRastreador INT,
    IdServico INT UNSIGNED NOT NULL,
		PRIMARY KEY(IdVeiculo),
		FOREIGN KEY (IdServico) REFERENCES Servico(IdServico)


		);

		INSERT INTO cliente (idCliente, nome, senha, endereco , telefone, dataNasc, email) VALUES
				(1, 'Fulano', ''),
				(2, 'nbbb', 'kkk');
				INSERT INTO cliente VALUES (2 , 'Ciclano' , '$2y$10$.k0afkzympQV/2fXYmuHh.h3PfE5nFqGbRHTHVqOo5vwGne4DfscK', 'rua qualquer' , '26598741' , '2000-08-30', 'ciclano@gmail.com');
				INSERT INTO pessoa_fisica VALUES (2 , '14785236901');
				INSERT INTO gerenciamento VALUES (1 , 'Ciclano' , '$2y$10$.k0afkzympQV/2fXYmuHh.h3PfE5nFqGbRHTHVqOo5vwGne4DfscK', 'rua qualquer' , '26598741' , '2000-08-30', 'gerente@gmail.com', '14785236902' );
				INSERT INTO servico VALUES (1 , 140 , 15, '2018-04-15' , 2 , 1);
				INSERT INTO pagamento VALUES
				(1, '2018-05-15', '2018-05-12', 1 ,140),
				(2, '2018-06-15', '2018-06-17', 1 ,140),
				(3, '2018-07-15', '2018-07-15', 1 ,140),
				(5, '2018-09-15', '2018-09-16', 1 ,140),
				(6, '2018-10-15', '2018-10-15', 1 ,140),
				(7, '2018-11-15', '2018-11-15', 1 ,140);
