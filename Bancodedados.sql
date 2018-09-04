CREATE TABLE Cliente (

		idCliente INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
		nome VARCHAR(30) NOT NULL,
		senha VARCHAR(30) NOT NULL,
		endereço VARCHAR(500),
		telefone INT(30),
		dataNasc DATE,
		email VARCHAR(100),
		PRIMARY KEY(IdCliente)

		);

CREATE TABLE Pessoa_Fisica (

		id_PF INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
		cnpj INT(14) NOT NULL,
		PRIMARY KEY(Id_PF),
    FOREIGN KEY (Id_Cliente) REFERENCES Cliente(Id_Cliente)

		);

CREATE TABLE Pessoa_Juridica (

		id_PJ INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
		cpf INT(11) NOT NULL,
		PRIMARY KEY(Id_PJ),
    FOREIGN KEY (Id_Cliente) REFERENCES Cliente(Id_Cliente)

		);


CREATE TABLE Pagamento (

				idPagamento INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
				data DATE,
				VALOR DOUBLE,
				PRIMARY KEY(IdPagamento)

				);

CREATE TABLE Gerenciamento (

				idGerenciamento INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
				nome VARCHAR(30) NOT NULL,
				senha VARCHAR(30) NOT NULL,
				endereço VARCHAR(500),
				telefone INT(30),
				dataNasc DATE,
				email VARCHAR(100),
				cpf INT(11),
				gerente BOOLEAN,
				subgerente BOOLEAN,
				PRIMARY KEY(IdGerenciamento)

				);



CREATE TABLE Servico (

		idServico INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
		valor DOUBLE NOT NULL,
		diaVenc INT(30) NOT NULL,
		dataContrato DATE,
		PRIMARY KEY(IdServico),
		FOREIGN KEY (Id_Pagamento) REFERENCES Pagamento(Id_Pagamento),
		FOREIGN KEY (Id_Cliente) REFERENCES Cliente(Id_Cliente),
		FOREIGN KEY (Id_Gerenciamento) REFERENCES Gerenciamento(Id_Gerenciamento)

		);

CREATE TABLE Celular (

		idCelular INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
		numero VARCHAR(30) NOT NULL,
		email VARCHAR(100),
		PRIMARY KEY(IdCelular),
		FOREIGN KEY (Id_Servico) REFERENCES Serviço(Id_Servico)

		);

CREATE TABLE Veiculo (

		idVeiculo INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
		modelo VARCHAR(30),
		placa VARCHAR(30),
		cor VARCHAR(30),
		ano DATE,
		numRastreador INT(100),
		PRIMARY KEY(IdVeiculo),
		FOREIGN KEY (Id_Servico) REFERENCES Serviço(Id_Servico)


		);
