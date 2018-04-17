import React, { Component } from 'react';
import { View } from 'react-native';
import Header from './components/header';
import VolunteerEventList from './components/VolunteerEventList';
import LoginForm from './components/LoginForm';
import SignUpForm from './components/SignUpForm';
import WelcomeUser from './components/WelcomeUser';
import GoalBar from './components/GoalBar';
import HomeScreen from './components/HomeScreen';
import AddEvent from './components/AddEvent';
import RecommendationsPage from './components/RecommendationsPage';
import { Router, Scene } from 'react-native-router-flux';
import Settings from './components/Settings.js';

class App extends Component {
  render() {
    return (
        <Router>
        <Scene key="root">
          <Scene key="login"
            component={LoginForm}
            title="Login"
            initial
            hideNavBar="true"
          />

          <Scene
            key="signup"
            component={SignUpForm}
            title="Sign Up"
            hideNavBar="true"
          />

          <Scene
            key="tabbar"
            tabs={true}
            tabBarStyle={
              { backgroundColor: '#FFFFFF',
                alignSelf: 'center',
                paddingBottom: 8
              }
            }
            labelStyle={
              { fontSize: 16,
                fontWeight: 'bold',
                flex: 1
              }
            }
            activeTintColor='#76CB89'
            tabBarPosition='bottom'
          >
            <Scene
              key="homescreen"
              component={HomeScreen}
              title="🏠"
              hideNavBar="true"
            />

            <Scene
              key="addevent"
              component={AddEvent}
              title="➕"
              hideNavBar="true"
            />

            <Scene
              key="explore"
              component={RecommendationsPage}
              title="💡"
              hideNavBar="true"
            />

            <Scene
              key="settings"
              component={Settings}
              title="🔧"
              hideNavBar="true"
            />

          </Scene>

        </Scene>
      </Router>
    );
  }
}

export default App;
