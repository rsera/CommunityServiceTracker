import React, { Component } from 'react';
import { View } from 'react-native';
import Header from './components/header';
import VolunteerEventList from './components/VolunteerEventList';
import LoginForm from './components/LoginForm';
import SignUpForm from './components/SignUpForm';
import HomeScreen from './components/HomeScreen.js';

import { Router, Scene } from 'react-native-router-flux';


// class App extends Component {
//   render() {
//     return (
//       <View>
//         // home
//         {/* <Header headerText={'vtrak'} />
//         <VolunteerEventList /> */}
//         // log in
//         <Header headerText={'Log In'} />
//         <LoginForm />
//         // sign up
//         {/* <Header headerText={'Sign Up'} />
//         <SignUpForm /> */}
//       </View>
//     );
//   }
// }

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
          key="homescreen"
          component={HomeScreen}
          title="vTrak"
          hideNavBar="true"
        />
        <Scene
          key="signup"
          component={SignUpForm}
          title="Sign Up"
          hideNavBar="true"
        />
      </Scene>
    </Router>
    );
  }
}

export default App;
