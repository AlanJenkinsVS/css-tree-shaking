<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Homepage</title>
  <style>
  <%=tailwind%>

  /* .m-1 {
    margin: .25rem;
  } */

  .p-1 {
    padding: .25rem;
  }

  .flex {
    display: flex;
  }

  .border {
    border-width: 1px;
    border-style: solid;
  }

  .justify-between {
    justify-content: space-between;
  }

  .w-full {
    width: 100%;
  }
  </style>
</head>
<body>
<div class="flex justify-between">
    <div class="w-full text-primary">
      <div class="m-1 p-1 bg-primary-lightest">Lightest</div>
      <div class="m-1 p-1 bg-primary-lighter">Lighter</div>
      <div class="m-1 p-1 bg-primary-light">Light</div>
      <div class="m-1 p-1 bg-primary">Primary </div>
      <div class="m-1 p-1 bg-primary-dark">Dark</div>
      <div class="m-1 p-1 bg-primary-darker">Darker</div>
      <div class="m-1 p-1 bg-primary-darkest">Darkest</div>
    </div>

    <div class="w-full text-secondary">
      <div class="m-1 p-1 bg-secondary-lightest">Lightest</div>
      <div class="m-1 p-1 bg-secondary-lighter">Lighter</div>
      <div class="m-1 p-1 bg-secondary-light">Light</div>
      <div class="m-1 p-1 bg-secondary">Secondary </div>
      <div class="m-1 p-1 bg-secondary-dark">Dark</div>
      <div class="m-1 p-1 bg-secondary-darker">Darker</div>
      <div class="m-1 p-1 bg-secondary-darkest">Darkest</div>
    </div>

    <div class="w-full text-tertiary">
      <div class="m-1 p-1 bg-tertiary-lightest">Lightest</div>
      <div class="m-1 p-1 bg-tertiary-lighter">Lighter</div>
      <div class="m-1 p-1 bg-tertiary-light">Light</div>
      <div class="m-1 p-1 bg-tertiary">Tertiary </div>
      <div class="m-1 p-1 bg-tertiary-dark">Dark</div>
      <div class="m-1 p-1 bg-tertiary-darker">Darker</div>
      <div class="m-1 p-1 bg-tertiary-darkest">Darkest</div>
    </div>
  </div>

  <div class="m-1 p-1 border border-primary-lightest">Lightest</div>
  <div class="m-1 p-1 border border-primary-lighter">Lighter</div>
  <div class="m-1 p-1 border border-primary-light">Light</div>
  <div class="m-1 p-1 border border-primary">Primary </div>
  <div class="m-1 p-1 border border-primary-dark">Dark</div>
  <div class="m-1 p-1 border border-primary-darker">Darker</div>
  <div class="m-1 p-1 border border-primary-darkest">Darkest</div>

  <p>
    Load:
    <a href="/">Cached Page</a> | 
    <a href="?cache=disabled">Cache Disabled</a> | 
    <a href="?cache=disabled&amp;rebuild">CSS Rebuild</a>
  </p>
</body>
</html>