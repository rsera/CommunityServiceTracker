import React from 'react';
import { Text, View } from 'react-native';

const Header = (props) => {
  const { textStyle, viewStyle } = styles;

  return  (
    <View style={viewStyle}>
      <Text style={textStyle}>{props.headerText}</Text>
    </View>
  );
};

const styles = {
  viewStyle: {
    backgroundColor: '#76CB89',
    justifyContent: 'center',
    alignItems: 'center',
    height: 60,
    elevation: 2,
    position: 'relative'
  },
  textStyle: {
    color: '#FFFFFF',
    fontSize: 30
  }
};

export default Header;