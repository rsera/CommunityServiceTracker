import React, { Component } from 'react';
import { View } from 'react-native';
import Header from './components/header';
import VolunteerEventList from './components/VolunteerEventList';
import LoginForm from './components/LoginForm';

class App extends Component {
  render() {
    return (
      <View>
        <Header headerText={'vtrak'} />
        {/* <Header headerText={'Log In'} />
        <LoginForm /> */}
        <VolunteerEventList />
    </View>
    );
  }
}

export default App;