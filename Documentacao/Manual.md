## Breve manual de utilização com prints
![Banana](http://cdn.osxdaily.com/wp-content/uploads/2013/07/dancing-banana.gif)
![Banana](http://cdn.osxdaily.com/wp-content/uploads/2013/07/dancing-banana.gif)
![Banana](http://cdn.osxdaily.com/wp-content/uploads/2013/07/dancing-banana.gif)
![Banana](http://cdn.osxdaily.com/wp-content/uploads/2013/07/dancing-banana.gif)
![Banana](http://cdn.osxdaily.com/wp-content/uploads/2013/07/dancing-banana.gif)
![Banana](http://cdn.osxdaily.com/wp-content/uploads/2013/07/dancing-banana.gif)
![Banana](http://cdn.osxdaily.com/wp-content/uploads/2013/07/dancing-banana.gif)
![Banana](http://cdn.osxdaily.com/wp-content/uploads/2013/07/dancing-banana.gif)


## Requisitos funcionais e não funcionais (requisitos.md, incluindo sumário com links)

- [Requisitos.md](https://github.com/cp2-dc-info-projeto-final-2018/requisitos-sysger/blob/master/Documentacao/Requisitos.md)

## Casos de uso (casosDeUso.md, incluindo sumário com links)

- [CasosDeUso.md](https://github.com/cp2-dc-info-projeto-final-2018/requisitos-sysger/blob/master/Documentacao/CasosDeUso.md)

## Diagrama de casos de uso (.asta e .png)

- [Diagrama de Casos de Uso](https://github.com/cp2-dc-info-projeto-final-2018/requisitos-sysger/blob/master/Documentacao/Diagrama%20de%20classe.asta)
  ![Casos de Uso](http://cdn.osxdaily.com/wp-content/uploads/2013/07/dancing-banana.gif)

## Diagrama de classes (.asta e .png)

- [Diagrama de Casos de Uso](https://github.com/cp2-dc-info-projeto-final-2018/requisitos-sysger/blob/master/Documentacao/Diagrama%20de%20classe.asta)
  ![Casos de Uso](http://cdn.osxdaily.com/wp-content/uploads/2013/07/dancing-banana.gif)


## Slides da apresentação (.pdf)

## Modelagem do banco de dados (arquivo editável e .png)

- [Banco de Dados](https://github.com/cp2-dc-info-projeto-final-2018/requisitos-sysger/blob/master/Codigo/Bancodedados.sql)


## Script de criação do banco de dados funcionando (.sql)

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
## Código funcional, com todos os arquivos necessário, em uma pasta própria
