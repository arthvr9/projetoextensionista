import matplotlib.pyplot as plt
import mysql.connector as mysql
import pandas as pd

def conectar():
    return mysql.connect(
        host='127.0.0.1',
        port='3306',
        user='root',
        password='aaaaaaaaaaa',
        database='form')

def executar_consulta(conexao, consulta):
    cursor = conexao.cursor(buffered=True)
    cursor.execute(consulta)
    registros = cursor.fetchall()
    return registros

def reconectar(conexao):
    tentativas = 3
    for _ in range(tentativas):
        try:
            conexao.ping(reconnect=True)
            return conexao
        except mysql.Error as err:
            print(f"Erro ao reconectar: {err}")
            continue
    raise Exception("Não foi possível reconectar ao servidor MySQL.")

consultas = {
    "generomasc": "SELECT COUNT(*) FROM form.informacoes WHERE genero = 'male'",
    "generofem": "SELECT COUNT(*) FROM orm.informacoes WHERE genero = 'female'",
    "generonb": "SELECT COUNT(*) FROM form.informacoes WHERE genero = 'none'",
    "idade": "SELECT idade FROM form.informacoes"
}

conexao = conectar()

resultados = {}
for chave, consulta in consultas.items():
    resultados[chave] = executar_consulta(conexao, consulta)

executar_consulta(consultas)

conexao.close()
