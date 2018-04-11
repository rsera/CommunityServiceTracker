// Wraps Header and Volunteer Event List into home HomeScreen

import React from 'react';
import { View } from 'react-native';
import Header from './header.js';
import VolunteerEventList from './VolunteerEventList.js';
import WelcomeUser from './WelcomeUser';
import GoalBar from './GoalBar.js';

const HomeScreen = () => {
  return (
    <View style={{flex:1}}>
      <Header headerText={'vTrak'} />
      	<WelcomeUser />
        <GoalBar />
      <VolunteerEventList />
    </View>
  );
}

export default HomeScreen;
