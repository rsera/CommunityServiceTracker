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
import { Router, Scene } from 'react-native-router-flux';

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
              { backgroundColor: '#FFFFFF'
              }
            }
            labelStyle={
              { fontSize: 16,
                fontWeight: 'bold',
                flex: 1
              }
            }
            tabBarPosition="bottom"
            activeTintColor='#76CB89'
          >
            <Scene
              key="homescreen"
              component={HomeScreen}
              title="Home"
              hideNavBar="true"
            />

            <Scene
              key="addevent"
              component={AddEvent}
              title="Add Event"
              hideNavBar="true"
            />
          </Scene>

        </Scene>
      </Router>
    );
  }
}

export default App;
