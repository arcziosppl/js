import "./App.css";

function App() {

  window.onload = () => {
 const main_div = document.querySelector(".d1");
  
  class xhr{
    path;

    getpath(p)
    {
     this.path = p;
    }

  }

  const xhr1 = new xhr();

  const xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "http://127.0.0.1:4000/script.php", false);
xmlhttp.send();
xhr1.getpath(JSON.parse(xmlhttp.responseText).path);

main_div.innerHTML = xhr1.path;


  }
  return (
    <div className="d1">
      
    </div>
  );
}



export default App;
