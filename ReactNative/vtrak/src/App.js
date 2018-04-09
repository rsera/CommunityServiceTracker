import React, { Component } from 'react';
import { View } from 'react-native';
import Header from './components/header';
import VolunteerEventList from './components/VolunteerEventList';
import LoginForm from './components/LoginForm';
import SignUpForm from './components/SignUpForm';
import GoalBar from './components/GoalBar';

class App extends Component {
  render() {
    return (
      <View>
        <Header headerText={'vtrak'} />
        <GoalBar goalBarText={'your goal'}/>
        <VolunteerEventList />
        {/* <Header headerText={'Log In'} />
        <LoginForm /> */}
        {/* <Header headerText={'Sign Up'} />
        <SignUpForm /> */}
      </View>
    );
  }
}

export default App;