import './App.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import Nav from './Components/Nav';
import Intro from './Components/Intro';
import FormSurvey from './Components/FormSurvey';
import Database from './Components/Database';
import SurveyFinished from './Components/SurveyFinished';


function App() {
  return (
    <Router basename="/React/survey">
      <div className="App">
        <Nav />
          <Switch>         
            <Route path="/" exact component={ Intro } />
            <Route path="/form_survey" exact component={ FormSurvey } />
            <Route path="/database" component={ Database } />
            <Route path="/survey_done" component={ SurveyFinished } />
          </Switch>
      </div>
    </Router>
  );
}

export default App;
