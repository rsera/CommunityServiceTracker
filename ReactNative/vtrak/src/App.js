import React, { Component } from 'react';
import { View } from 'react-native';
import Header from './components/header';
import VolunteerEventList from './components/VolunteerEventList';
import LoginForm from './components/LoginForm';
import SignUpForm from './components/SignUpForm';

class App extends Component {
  render() {
    return (
      <View>
        // home
        {/* <Header headerText={'vtrak'} />
        <VolunteerEventList /> */}
        // log in
        <Header headerText={'Log In'} />
        <LoginForm />
        // sign up
        {/* <Header headerText={'Sign Up'} />
        <SignUpForm /> */}
      </View>
    );
  }
}

export default App;