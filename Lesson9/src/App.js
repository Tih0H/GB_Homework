import './App.css';
import { AuthProvider } from './hooks/AuthProvider';
import Router from './pages/Router';

function App() {
  const testText = 'myTestText';
  
  return (
    <div className={"App"}>
      <header className="App-header">
        <AuthProvider>
          <Router testText={testText}/>
        </AuthProvider>
        
      </header>
    </div>
  );
}

export default App;
