create database consultorio;
use consultorio;

create table Paciente (
	idCliente int(11) NOT NULL AUTO_INCREMENT UNIQUE key,
	cpf varchar(12) not null UNIQUE KEY,
    nome varchar(50) not null,
    rg varchar(10) not null,
    dataNasc date not null,
    estadoCivil varchar(20),
    celular varchar(12),
    sexo varchar(10) not null,
    PRIMARY KEY (cpf)
);

INSERT INTO Paciente(cpf, nome, rg, dataNasc, estadoCivil, celular, sexo) values('01429374284', 'Adriano de Sa Alegria', '25964282', '1994-04-29', 'solteiro', '92995330079', 'masculino');
INSERT INTO Paciente(cpf, nome, rg, dataNasc, estadoCivil, celular, sexo) values('02929374289', 'Fabiana Julho', '52964228', '1988-07-16', 'solteira', '92995550098', 'feminino');
INSERT INTO Paciente(cpf, nome, rg, dataNasc, estadoCivil, celular, sexo) values('03293742887', 'Rita campos', '65964293', '1973-04-05', 'solteira', '92994235489', 'feminino'); 
SELECT * FROM Paciente;
SELECT nome as Nome_Do_Paciente, dataNasc as Data_De_Nascimento, celular as CELULAR FROM Paciente where nome Like 'a%'

create table Medico (
	idMedico int not null AUTO_INCREMENT UNIQUE key,
	crm varchar(20) not null UNIQUE KEY,
	nome varchar(50) not null,
    cpf varchar(12) not null UNIQUE KEY,
    dataNasc date not null,
    estadoCivil varchar(20),
    celular varchar(12),
    sexo varchar(10) NOT NULL,
	especialidadeMedica varchar(20) not null,
    PRIMARY KEY (crm),
	FOREIGN KEY (especialidadeMedica) REFERENCES EspecialidadeMedica(especialidade)
);

INSERT INTO Medico(crm, nome, cpf, dataNasc, estadoCivil, celular, sexo, especialidadeMedica) values('123', 'Luiz Costa', '08929374299', '1972-06-07', 'casado', '92984559998', 'masculino', 'Cardiologista');
INSERT INTO Medico(crm, nome, cpf, dataNasc, estadoCivil, celular, sexo, especialidadeMedica) values('298', 'Mario Silva', '99929374212', '1979-04-19', 'solteiro', '92994559930', 'masculino', 'Urologista');
INSERT INTO Medico(crm, nome, cpf, dataNasc, estadoCivil, celular, sexo, especialidadeMedica) values('352', 'Josiane Matos', '45929374299', '1980-12-12', 'casada', '92992559911', 'feminino', 'Psicologia');
INSERT INTO Medico(crm, nome, cpf, dataNasc, estadoCivil, celular, sexo, especialidadeMedica) values('589', 'Emilda Alegria', '22929374259', '1981-01-28', 'solteira', '92999559921', 'feminino', 'Oftalmologista');
INSERT INTO Medico(crm, nome, cpf, dataNasc, estadoCivil, celular, sexo, especialidadeMedica) values('987', 'Evandro Mendes', '21929374257', '1983-09-15', 'casado', '92992431717', 'masculino', 'Clinico Geral');
SELECT * FROM MEDICO;
SELECT * FROM Medico where nome like 'Luiz%';
SELECT Medico.crm as CRM_Medico, Medico.nome as NOME, Medico.cpf as CPF, Medico.sexo as SEXO, EspecialidadeMedica.especialidade as Especialidade_Medica FROM Medico Inner Join EspecialidadeMedica on Medico.especialidadeMedica = EspecialidadeMedica.especialidade;

create table EspecialidadeMedica (
	idEspecialidade int not null AUTO_INCREMENT UNIQUE KEY,
    especialidade varchar(20) not null UNIQUE KEY,
    PRIMARY KEY (especialidade)    
);
INSERT INTO EspecialidadeMedica(especialidade) values('Cardiologista');
INSERT INTO EspecialidadeMedica(especialidade) values('Dermatologista');
INSERT INTO EspecialidadeMedica(especialidade) values('Clinico Geral');
INSERT INTO EspecialidadeMedica(especialidade) values('Urologista');
INSERT INTO EspecialidadeMedica(especialidade) values('Pediatra');
INSERT INTO EspecialidadeMedica(especialidade) values('Oftalmologista');
INSERT INTO EspecialidadeMedica(especialidade) values('Fonaudiologista');
INSERT INTO EspecialidadeMedica(especialidade) values('Psicologia');
INSERT INTO EspecialidadeMedica(especialidade) values('Neurologia');
INSERT INTO EspecialidadeMedica(especialidade) values('Ortopedia');
INSERT INTO EspecialidadeMedica(especialidade) values('Reumatologista');
SELECT * FROM EspecialidadeMedica;
Select especialidade as Especialidade_Medica from EspecialidadeMedica where especialidade like 'c%'

create table Consulta(
	idConsulta INT NOT NULL AUTO_INCREMENT,
	cpfPaciente varchar(12) not null,
    crmMedico varchar(20) not null,
	especialidadeMedica varchar(20) not null,
    dataConsulta date not null,
    PRIMARY KEY(idConsulta),
    FOREIGN KEY (cpfPaciente) REFERENCES Paciente(cpf),
    FOREIGN KEY (crmMedico) REFERENCES Medico(crm),
	FOREIGN KEY (especialidadeMedica) REFERENCES EspecialidadeMedica(especialidade)
);

INSERT INTO Consulta(cpfPaciente, crmMedico, especialidadeMedica, dataConsulta) values('02929374289', '123', 'Cardiologista', '2019-04-05');
INSERT INTO Consulta(cpfPaciente, crmMedico, especialidadeMedica, dataConsulta) values('01429374284', '298', 'Urologista', '2019-04-06');
INSERT INTO Consulta(cpfPaciente, crmMedico, especialidadeMedica, dataConsulta) values('03293742887', '352', 'Psicologia', '2019-04-07');
SELECT consulta.idConsulta as ID_DA_Consulta, consulta.cpfPaciente as CPF_Paciente, Paciente.nome as NOME_PACIENTE, consulta.crmMedico as CRM_MEdico, Medico.nome AS NOME_MEDICO, consulta.especialidadeMedica AS ESPECIALIDADE_MEDICA,
consulta.dataConsulta AS DATA_DA_CONSULTA from Consulta inner join Paciente ON consulta.cpfPaciente = Paciente.cpf Inner join Medico ON consulta.crmMedico = Medico.crm WHERE consulta.dataConsulta > '2019-04-05';