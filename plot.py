import matplotlib.pyplot as plt
import mysql.connector as mysql
import pandas as pd

def conectar():
    return mysql.connect(
        host="127.0.0.1",
        port="3306",
        user="root",
        password="arthur301082",
        database="form")

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
    "Masculino": "SELECT COUNT(*) FROM form.informacoes WHERE genero = 'male'",
    "Feminino": "SELECT COUNT(*) FROM form.informacoes WHERE genero = 'female'",
    "Não identificado": "SELECT COUNT(*) FROM form.informacoes WHERE genero = 'none'",
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

consultaid = {
    "idade_homem": "SELECT idade FROM form.informacoes WHERE genero = 'male'",
    "idade_mulher": "SELECT idade FROM form.informacoes WHERE genero = 'female'",
    "idade_ni": "SELECT idade FROM form.informacoes WHERE genero = 'none'"
}

resultados_idade = {}
for chave, consulta in consultaid.items():
    resultados_idade[chave] = executar_consulta(consulta, conexao)

idades_homem = [idade[0] for idade in resultados_idade['idade_homem'] if idade[0] is not None]
idades_mulher = [idade[0] for idade in resultados_idade['idade_mulher'] if idade[0] is not None]
idades_ni = [idade[0] for idade in resultados_idade['idade_ni'] if idade[0] is not None]

plt.hist(idades_homem, bins=10, edgecolor='black', alpha=0.5, label='Homens')
plt.hist(idades_mulher, bins=10, edgecolor='black', alpha=0.5, label='Mulheres')
plt.hist(idades_ni, bins=10, edgecolor = 'black', alpha=0.5, label="Não identificado")
plt.title('Distribuição de Idade por Gênero')
plt.xlabel('Idade')
plt.ylabel('Frequência')
plt.legend()
plt.grid(True)
plt.show()

conexao.close()
