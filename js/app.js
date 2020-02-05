function onSubmit(){
    const data = new FormData(document.getElementById("register"))
    const name = data.get("nombre")
    const edad = data.get("edad")
    const tel = data.get("telefono")
    const fb = data.get("facebook")
    const bautizado = data.get("bautizado")
    const confirmado = data.get("confirmado")
    const evangelizado = data.get("evangelizado")
    const first = data.get("first_time")
    const reason = data.get("entrar_a_missio")
    const server1 = data.get("servidores1")
    const server2 = data.get("servidores2")
    const server3 = data.get("servidores3")

    console.log(`Hola ${name}, tienes ${edad} años, tu número es ${tel}, tu face es ${fb}, ${bautizado} estás bautizado, ${confirmado} estás confirmado, ${evangelizado} estás evangelizado, ${first} es tu primera vez en Missio, te gustaría entrar a Missio porque: ${reason}, tu opciones son ${server1}, ${server2}, ${server3}.`)
    alert(`Gracias por registrarte ${name}`)
}