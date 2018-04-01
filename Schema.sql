CREATE TABLE Professores (siape INTEGER PRIMARY KEY,
						  nome VARCHAR(50) NOT NULL,
						  titulacao VARCHAR(80),
						  lattes VARCHAR(200),
						  email VARCHAR(100),
						  foto VARCHAR(40),
						  ativo BOOLEAN DEFAULT TRUE);

CREATE TABLE Noticias (id SERIAL PRIMARY KEY,
				       titulo VARCHAR(60) NOT NULL,
				       descricao VARCHAR(5000) NOT NULL,
				       dataHoraPublicacao TIMESTAMP DEFAULT NOW(),
				       dataHoraAtualizacao TIMESTAMP DEFAULT NOW(),
				       foto VARCHAR(40));

CREATE TABLE Noticia_Foto(noticiaId INTEGER REFERENCES Noticias(id) ON DELETE CASCADE,
						  foto VARCHAR(40) NOT NULL);

CREATE TYPE CURSO AS ENUM ('integrado', 'superior');

CREATE TABLE Tccs  (id SERIAL PRIMARY KEY,
				    titulo VARCHAR(50) NOT NULL,
				    autor VARCHAR(50) NOT NULL,
				    palavrasChave VARCHAR(30) NOT NULL,
				    ano INTEGER,
			        curso CURSO NOT NULL,
			        file VARCHAR(40) NOT NULL,
			       	professorId INTEGER REFERENCES Professores(siape));

CREATE TYPE TIPO_PROJETO AS ENUM ('ensino', 'extensao', 'pesquisa');

CREATE TABLE Projetos (id SERIAL PRIMARY KEY,
				       titulo VARCHAR(100) NOT NULL,
				       coordenador INTEGER REFERENCES Professores(siape),
				       descricao VARCHAR(5000),
				       tipo TIPO_PROJETO NOT NULL);

CREATE TABLE Projeto_Professor (idProfessor INTEGER REFERENCES Professores(siape) ON DELETE CASCADE,
								idProjeto INTEGER REFERENCES Projetos(id) ON DELETE CASCADE);

CREATE TABLE Projeto_Bolsista (aluno VARCHAR(50) NOT NULL,
							   idProjeto INTEGER REFERENCES Projetos(id) ON DELETE CASCADE);
