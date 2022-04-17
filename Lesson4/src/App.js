import './App.css';
import Router from './pages/Router';

function App() {
  const testText = 'myTestText';
  
  return (
    <div className={"App"}>
      <header className="App-header">
        <Router testText={testText}/>
      </header>
    </div>
  );
}

export default App;
