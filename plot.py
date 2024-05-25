import matplotlib.pyplot as plt
import mysql.connector as mysql
import pandas as pd

def conectar():
    return mysql.connect(
        host="mysql.investeaifsg.com.br",
        user="investeai",
        password="arthur301082",
        database="investeai")

def executar_consulta(consulta, conexao):
    cursor = conexao.cursor(buffered=True)
    cursor.execute(consulta)
    registros = cursor.fetchall()
    return registros

def reconectar():
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
    "Masculino": "SELECT COUNT(*) FROM investeai.informacoes WHERE genero = 'male'",
    "Feminino": "SELECT COUNT(*) FROM investeai.informacoes WHERE genero = 'female'",
    "Não identificado": "SELECT COUNT(*) FROM investeai.informacoes WHERE genero = 'none'",
}

try:
    conexao = conectar()
except mysql.Error as err:
    conexao = reconectar()
    raise Exception("Não foi possível conectar ao servidor novamente.")

resultados = {}
for chave, consulta in consultas.items():
    resultados[chave] = executar_consulta(consulta, conexao)

dados = {}
for chave, resultado in resultados.items():
    if resultado:
        dados[chave] = resultado[0][0]
    else:
        print(f"A consulta {chave} não retornou resultados.")

print("Número de registros por gênero:")
for chave, valor in dados.items():
    print(f"{chave}: {valor}")

if any(pd.isna(valor) for valor in dados.values()) or any(valor == 0 for valor in dados.values()):
    print("Os dados contêm valores inválidos ou zeros. Não é possível plotar o gráfico de pizza.")
else:
    plt.pie(dados.values(), labels=dados.keys(), autopct='%1.1f%%')
    plt.title("Distribuição de gênero")
    plt.show()

consultapi = {
    "baixo": "SELECT perfil FROM investeai.informacoes WHERE perfil = 'Baixo Risco'",
    "intermediario": "SELECT perfil FROM investeai.informacoes WHERE perfil = 'Intermediário'",
    "alto": "SELECT perfil FROM investeai.informacoes WHERE perfil = 'Alto Risco'"
}

resultadopi = {}
for chave, resultado in resultadopi.items():
    if resultado:
        dados[chave] = resultado[0][0]
    else:
        print(f"A consulta {chave} não retornou resultados.")
        
    plt.pie(dados.values(), labels=dados.keys(), autopct='%1.1f%%')
    plt.title("Distribuição de perfil de investidor")
    plt.show()
plt.grid(True)
plt.show()

conexao.close()
