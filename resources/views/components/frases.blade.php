<div id="quote-container" class="relative z-20 mt-auto">
    <blockquote class="space-y-2">
      <p id="quote-message" class="text-lg"></p>
      <footer id="quote-author" class="text-sm text-neutral-300"></footer>
    </blockquote>
  </div>
  
  <script>
    const frases = [
      'Actúa solo según aquella máxima que puedas querer que se convierta en ley universal. - Immanuel Kant',
      'Una vida sin examinar no vale la pena ser vivida. - Sócrates',
      'Está presente por encima de todo. - Naval Ravikant',
      'Haz lo que puedas, con lo que tengas, donde estés. - Theodore Roosevelt',
      'La felicidad no es algo prefabricado. Viene de tus propias acciones. - Dalai Lama',
      'El que está contento es rico. - Laozi',
      'Empiezo a hablar solo cuando estoy seguro de que lo que voy a decir no es mejor dejarlo sin decir. - Catón el Joven',
      'No he fracasado. Solo he encontrado 10,000 formas que no funcionan. - Thomas Edison',
      'Si no tienes una meta constante en la vida, no puedes vivirla de manera constante. - Marco Aurelio',
      'Nunca es tarde para ser lo que podrías haber sido. - George Eliot',
      'No es pobre el que tiene poco, sino el que desea más. - Séneca',
      'Importa más la calidad que la cantidad. - Lucio Anneo Séneca',
      'Saber no es suficiente; debemos aplicar. Estar dispuesto no es suficiente; debemos actuar. - Leonardo da Vinci',
      'Que todas tus cosas tengan su lugar; que cada parte de tu negocio tenga su tiempo. - Benjamin Franklin',
      'Vive como si fueras a morir mañana. Aprende como si fueras a vivir para siempre. - Mahatma Gandhi',
      'Sin palabras de sobra ni acciones innecesarias. - Marco Aurelio',
      'Nada que valga la pena se consigue fácilmente. - Theodore Roosevelt',
      'Ordena tu alma. Reduce tus deseos. - Agustín de Hipona',
      'Las personas encuentran placer de diferentes maneras. Yo lo encuentro manteniendo mi mente clara. - Marco Aurelio',
      'La simplicidad es un gusto adquirido. - Katharine Gerould',
      'La simplicidad es consecuencia de emociones refinadas. - Jean D\'Alembert',
      'La simplicidad es la esencia de la felicidad. - Cedric Bledsoe',
      'La simplicidad es la máxima sofisticación. - Leonardo da Vinci',
      'Sonríe, respira y avanza lentamente. - Thich Nhat Hanh',
      'La única forma de hacer un gran trabajo es amar lo que haces. - Steve Jobs',
      'Todo el futuro está en incertidumbre: vive de inmediato. - Séneca',
      'Se necesita muy poco para llevar una vida feliz. - Marco Aurelio',
      'No pierdas más tiempo discutiendo lo que debería ser un buen hombre. Sé uno. - Marco Aurelio',
      'Bien empezado es medio hecho. - Aristóteles',
      'Cuando no hay deseo, todas las cosas están en paz. - Laozi',
      'Camina como si besaras la Tierra con tus pies. - Thich Nhat Hanh',
      'Porque estás vivo, todo es posible. - Thich Nhat Hanh',
      'Al inhalar, calmo el cuerpo y la mente. Al exhalar, sonrío. - Thich Nhat Hanh',
      'La vida solo está disponible en el momento presente. - Thich Nhat Hanh',
      'La mejor forma de cuidar el futuro es cuidar el momento presente. - Thich Nhat Hanh',
      'Nada en la vida debe ser temido, solo entendido. Ahora es el momento de entender más, para temer menos. - Marie Curie',
      'La batalla más grande es la guerra contra la ignorancia. - Mustafa Kemal Atatürk',
      'Recuerda siempre que eres absolutamente único. Igual que todos los demás. - Margaret Mead',
      'Debes ser el cambio que deseas ver en el mundo. - Mahatma Gandhi',
    ];
  
    const randomIndex = Math.floor(Math.random() * frases.length);
    const [mensaje, autor] = frases[randomIndex].split(" - ");
  
    document.getElementById("quote-message").textContent = `“${mensaje}”`;
    document.getElementById("quote-author").textContent = autor;
  </script>
  
      </div>