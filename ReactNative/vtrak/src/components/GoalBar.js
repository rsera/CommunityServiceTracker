import React from 'react';
import { View, Text } from 'react-native';

const GoalBar = (props) => {
  const { viewStyle, textStyle, colorFillStyle, color2FillStyle } = styles;

  // getGoalHours: function () {
  //   return { goalHours: 100 };
  // },

  // getCurrentHours: function () {
  //   return { currentHours: 60 }
  // }, 

  return  (
    <View style={viewStyle}>
      {/* <Text> Goal </Text> */}
      <View style={colorFillStyle}></View>
      <View style={color2FillStyle}></View>
      <Text style={textStyle}> {/*{this.state.currentHours}*/}40/60{/*{this.state.goalHours}*/} </Text>
    </View>
  );
};

const styles = {
  viewStyle: {
    justifyContent: 'flex-start',
    alignItems: 'center',
    height: 70,
    position: 'relative',
    flexDirection: 'row',
    margin: 10
  },
  textStyle: {
    color: '#FFFFFF',
    fontSize: 15,
    // justifyContent: 'center',
    alignItems: 'center',
    position: 'absolute',
    fontFamily: 'sansation',
  },
  colorFillStyle: {
    backgroundColor: '#45537A',
    justifyContent: 'flex-end',
    alignItems: 'center',
    height: 50,
    width: "60%",
    position: 'relative',
    flexDirection: 'row',
    paddingLeft: 10
  },
  color2FillStyle: {
    backgroundColor: '#BDBDBD',
    justifyContent: 'flex-end',
    alignItems: 'center',
    height: 50,
    width: "40%",
    position: 'relative',
    flexDirection: 'row',
    paddingRight: 10
  }
};

export default GoalBar;