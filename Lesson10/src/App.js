import './App.css';
import { AuthProvider } from './hooks/AuthProvider';
import Router from './pages/Router';

function App() {
  const testText = 'myTestText';
  // "jest": "^28.1.0",
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
