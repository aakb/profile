<?php
$path_to_theme = "/profiles/loopdk/themes/loop/";
?>
<?php include('inc/head.inc') ?>
<title>LOOP - Ask question</title>
</head>

<body>
<div class="page-wrapper js-page-wrapper">
  <div class="page-inner">
    <?php include 'inc/header.inc'; ?>
    <?php include('inc/search-block.inc') ?>
    <div class="layout--wrapper">
      <div class="layout--inner">
        <h1 class="page-title">Opret spørgsmål</h1>
        <p>
          Udfyld formularen for at oprette dit spørgsmål. Husk at brug søgefunktionen først, så du ikke opretter et spørgsmål der allerede er blevet oprettet (og evt. besvaret).
        </p>
        <div class="form-module">
          <form action="ask-question.php">
            <div class="form-item">
              <label for="question-categori">Kategori <span class="form-required">*</span></label>
              <select class="form-select" required>
                <option value="">Vælg kategori</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
              </select>
            </div>
            <div class="form-item">
              <label for="question-terms">Nøgleord <span class="form-required">*</span></label>
              <div class="at-term-list">
                <div class="at-term at-term-remove activeTagsRemove-processed">
                  <span class="at-term-text">Afgørelser</span>
                </div>
                <div class="at-term at-term-remove activeTagsRemove-processed">
                  <span class="at-term-text">Optag lås</span>
                </div>
              </div>
              <input type="text" placeholder="Indtast nøgleord, systemet kommer automatisk med forslag" class="at-term-entry form-text" id="question-terms" required>
              <input type="submit" value="Tilføj nøgleord" class="at-add-btn">
              <div class="form-item-description">Indtast nøgleord, systemet kommer automatisk med forslag. Tryk på enter eller knappen for at tilføje.</div>
            </div>
            <div class="form-item">
              <label for="question-textarea">Spørgsmål <span class="form-required">*</span></label>
              <textarea rows="1" class="form-textarea" id="question-textarea" required></textarea>
              <div class="form-item-description">Enter your question or observation.</div>
            </div>
            <div class="form-actions">
              <input type="submit" value="Opret spørgsmål" class="form-submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
