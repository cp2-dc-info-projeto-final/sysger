CREATE TABLE Cliente (

		idCliente INT UNSIGNED AUTO_INCREMENT NOT NULL,
		nome VARCHAR(30) NOT NULL,
		senha VARCHAR(30) NOT NULL,
		endereço VARCHAR(500),
		telefone INT,
		dataNasc DATE,
		email VARCHAR(100),
		PRIMARY KEY(IdCliente)

		);

CREATE TABLE Pessoa_Fisica (

		id_PF INT UNSIGNED AUTO_INCREMENT NOT NULL,
		cpf INT NOT NULL,
    IdCliente INT UNSIGNED NOT NULL,
		PRIMARY KEY(Id_PF),
   	FOREIGN KEY (Id_PF) REFERENCES Cliente(IdCliente)

		);

CREATE TABLE Pessoa_Juridica (

		id_PJ INT UNSIGNED AUTO_INCREMENT NOT NULL,
		cnpj INT NOT NULL,
    IdCliente INT UNSIGNED NOT NULL,
		PRIMARY KEY(Id_PJ),
   	FOREIGN KEY (Id_PJ) REFERENCES Cliente(IdCliente)

		);


CREATE TABLE Pagamento (

				idPagamento INT UNSIGNED AUTO_INCREMENT NOT NULL,
				data DATE,
				VALOR DOUBLE,
				PRIMARY KEY(IdPagamento)

				);

CREATE TABLE Gerenciamento (

				idGerenciamento INT UNSIGNED AUTO_INCREMENT NOT NULL,
				nome VARCHAR(30) NOT NULL,
				senha VARCHAR(30) NOT NULL,
				endereço VARCHAR(500),
				telefone INT,
				dataNasc DATE,
				email VARCHAR(100),
				cpf INT,
				gerente BOOLEAN,
				subgerente BOOLEAN,
				PRIMARY KEY(IdGerenciamento)

				);



CREATE TABLE Servico (

		idServico INT UNSIGNED AUTO_INCREMENT NOT NULL,
		valor DOUBLE NOT NULL,
		diaVenc INT NOT NULL,
		dataContrato DATE,
    IdPagamento INT UNSIGNED NOT NULL,
    IdCliente INT UNSIGNED NOT NULL,
    IdGerenciamento INT UNSIGNED NOT NULL,
		PRIMARY KEY(IdServico),
		FOREIGN KEY (IdPagamento) REFERENCES Pagamento(IdPagamento),
		FOREIGN KEY (IdCliente) REFERENCES Cliente(IdCliente),
		FOREIGN KEY (IdGerenciamento) REFERENCES Gerenciamento(IdGerenciamento)

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
		modelo VARCHAR(30),
		placa VARCHAR(30),
		cor VARCHAR(30),
		ano DATE,
		numRastreador INT,
    IdServico INT UNSIGNED NOT NULL,
		PRIMARY KEY(IdVeiculo),
		FOREIGN KEY (IdServico) REFERENCES Servico(IdServico)


		);
