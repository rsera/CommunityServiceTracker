// Wraps Header and Volunteer Event List into home HomeScreen

import React from 'react';
import { View } from 'react-native';
import Header from './header.js';
import VolunteerEventList from './VolunteerEventList.js';
import WelcomeUser from './WelcomeUser';
import GoalBar from './GoalBar.js';
import RecentHistoryHeader from './RecentHistoryHeader.js';
import GoalText from './GoalText.js';

const HomeScreen = () => {
  return (
    <View style={{flex:1}}>
      <View style={{backgroundColor: '#F9F9F9'}}>
        <Header headerText={'vTrak'} />
      	<WelcomeUser />
        <GoalBar />
        <RecentHistoryHeader />
      </View>
      <VolunteerEventList />
    </View>
  );
}

export default HomeScreen;
